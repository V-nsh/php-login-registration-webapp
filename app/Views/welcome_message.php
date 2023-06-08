<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Aptcoder home page!</title>
    <link rel="stylesheet" href="<?php echo base_url('css/common.css'); ?>">
</head>
<body>
    <header>
        <div class="menu">
            <ul>
                <li><a href="<?= base_url('user/signin') ?>">Login</a></li>
                <li><a href="<?= base_url('user/register')?>">Register</a></li>
                <li><a href="#projects">Source Code</a></li>
            </ul>
        </div>
        <h1>Vansh Purohit</h1>
    </header>
    <div class="content">
    <?= session()->getFlashdata('success') ?>
        <section id="projects">
            <h2>Source Code</h2>
            <div class="project">
                <a href="https://github.com/V-nsh/php-login-registration-webapp.git">
                    <p>php-login-registration-webapp</p>
                </a>
            </div>
        </section>
    </div>

    <div class="content">
        <section id="about">
            <h2>About Me</h2>
            <p>Hello! Since there's too much of empty space I will briefly tell you about myself! I'm Vansh Purohit, a web developer with a passion for creating elegant and functional websites. I have experience in front-end and back-end web development, and I love turning ideas into reality through code. I strive for clean and efficient code, and I enjoy working collaboratively to achieve outstanding results.</p>
        </section>

        <section id="contact">
            <h2>Contact Information</h2>
            <p>Email: vanshpurohit123@gmail.com</p>
            <p>Phone: +91 91378 85309</p>
            <p>Location: Mumbai, Maharashtra</p>
        </section>

        <section id="skills">
            <h2>Skills</h2>
            <ul>
                <li>HTML5</li>
                <li>CSS3</li>
                <li>JavaScript</li>
                <li>PHP</li>
                <li>MySQL</li>
                <li>React.js</li>
                <li>Node.js</li>
                <li>Git</li>
                <li>Responsive Design</li>
                <li>Problem Solving</li>
            </ul>
        </section>

    </div>

    <footer>
        <p>&copy; 2023 Vansh Purohit. Just a login registration page!</p>
    </footer>
</body>
</html>
