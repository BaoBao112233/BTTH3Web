<?php

namespace BT3\Controllers;

use BT3\Models\User;
use PDO;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class UserController
{
    private $user;
    private $twig;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=demoth3';
        $username = 'root';
        $password = '';
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        $db = new PDO($dsn, $username, $password, $options);

        $this->user = new User($db);

        $loader = new FilesystemLoader(__DIR__ . '/../views');
        $this->twig = new Environment($loader);
    }

    public function index()
    {
        $users = $this->user->all();

        echo $this->twig->render('users/index.twig', ['users' => $users]);
    }

    public function create()
    {
        echo $this->twig->render('users/create.twig');
    }

    public function store()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $this->user->create($name, $email, $pass);

        header('Location: index.php?action=index');
    }

    public function edit($id)
    {
        $user = $this->user->find($id);

        echo $this->twig->render('users/edit.twig', ['user' => $user]);
    }

    public function update($id)
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $this->user->update($id, $name, $email, $pass);
        header('Location: index.php?action=index');
    }
    
    public function delete($id)
    {
        $this->user->delete($id);
    
        header('Location: index.php?action=index');
    }
}    