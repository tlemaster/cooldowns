
<h1 align="center">Cooldowns</h1>
<h4 align="center">A Smite Cooldowns Timer for the People</h4>
<p align="center">  
    <a href="https://symfony.com/doc/4.0/reference/requirements.html"><img src="https://img.shields.io/badge/Symfony-4.0-orange.svg?style=for-the-badge"></a>
    <a href="http://www.php.net/"><img src="https://img.shields.io/badge/PHP-%5E7.1.3-orange.svg?style=for-the-badge"></a>
    <a href="#"><img src="https://img.shields.io/badge/Built%20With-Love-orange.svg?style=for-the-badge"></a>
</p>
<br/>

<h4 align="center">Vagrant Development Setup</h4>
<ol align="center">
    <li>Using a local cmd tool run 'vagrant up' to start vm - built using Puphpet (jan 2018)</li>
    <li>Use a Mysql client to connect to guest machine's mysql server and create an empty database named cooldowns_dev</li>
    <li>'vagrant ssh' to access guest machine
        <ul>
            <li>Update Node.js to verion 8 or higher by completing instuctions <a href="https://nodejs.org/en/download/package-manager/#debian-and-ubuntu-based-linux-distributions">here</a></li>
            <li>Install Yarn by completing instructions <a href="https://yarnpkg.com/lang/en/docs/install/#debian-stable">here</a>
        </ul>
    <li>While still inside guest machine cd to /var/www/ directory complete the following steps:
        <ul>
            <li>run 'composer install' to install bundle dependencies</li> 
            <li>Copy the contents of the .env.dist file in this directory (/var/www/) to a new file named .env</li>
            <li>With newly created .env file modify the value of the parameter DATABASE_URL to the following: mysql://db_user:db_password@127.0.0.1:3306/db_name</li>
            <li>run 'bin/console doctine:migrations:migrate' to install schema to database created in earlier step</li>
            <li>run 'bin/console app:update-gods'</li>     
        </ul>
    </li>
    <li>On local machine add the following to you local hosts file: 192.168.56.111  cooldowns.code</li>
    <li>Visit cooldowns.code within browser to confirm sucessfull setup</li>
</li>
</ol>
<br/>

<h4 align="center">Project's Custom Symfony Console Commands</h4>
<p align="center"><b>app:update-gods</b> - Command to update database Gods data from HiRez API<p>
<br/>