# Control Escolar Proyecto

### Generalidades

Bienvenido al proyecto de Control Escolar, con motivos de aprendizaje me tomé la libertad de decidir como escribir este archivo _README.md_ para futuros becarios, por lo que a continuación, escribiré lo restante en inglés, toma en cuenta que siempre está la posibilidad de utilizar un traductor para entenderlo mejor.

### About project

This is a project focused on 4 programs from _Agenda Ambiental_, which is and academic area, there are many roles to evaluate where a view will be at the moment, so this could be change in a future, it it is, read all documentation in here.

### How do I install project?

This is very important, because in my experience was very hard to install, if you have any problems installing it, ask the last _becario_ they could be helpful for you.

Therefore I will explain what I have to do, when I was installing it.

Firs of all, you need to install all dependencies needed, as NodeJS, Laravel, \* _Laragon_ \*, MySQL, if you are managing Linux, I recommend you to install nvm for Nodejs installation.

Notes:

    * Laragon installs all necesarily dependencias except for node and git.

    * It is important to install php 7.4.* where * is whatever subversion, but I recommend 33 so you should be working on php 7.4.33

You see Laragon could be optional, this is because, this project doesn't need necessarily Laragon, just because we only need artisan serve to run project to work local, I only used it for working on Windows because we need to use unix commands and obviusly git, and database. I assume, you know how to install this dependencies so if you are not, prepare yourself to self-learning.

Once, you have installed all dependencies, next step is to run next commands on your terminal with project folder opened in terminal:

1.  composer update ( _alternatively_: composer install )
2.  php --ini
3.  npm install
4.  php artisan storage:link

    **Extra:**

        You need to configure your .env, it is important because it contains all credential needed for working, nevertheless I will try to let you as complete as possible, but remember to work in database you should have tables within names inside this document.

5.  php artisan key:generate

---

**Optional**

You can also migrate database from seeds using:

- php artisan migrate --seed
- php artisan migrate:fresh --seed

---

_Note: This could be working on all projects which use Laravel_

### Running _This_ Project

I need to emphasize on **this** beacause, this extra steps, works only on Laravel-vue project

**Run next commands**

- npm run watch
- php artisan serve

1. php artisan optimize
2. composer dump-autoload

You will notice that I write two different lists, this is because, the numbered list it is needed to do in that way.

I suddenly encourage you to do the most long processes which is first the numbered list in that order and simultaneously run the npm command, so this will start running your project as fast as can your computer.

If you have done this steps as I was commenting you, you can start working very easily.
