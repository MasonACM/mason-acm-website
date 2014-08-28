<?php

/**
 * Navbar composer
 */
View::composer('partials.navbar', 'MasonACM\Composers\NavbarComposer');

/**
 * Home composer (uses base composer)
 */
View::composer('pages.home', 'MasonACM\Composers\BaseComposer');