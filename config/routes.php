<?php

return array(
    
    'news/([0-9]+)' => 'news/view/$1',
    '' => 'news/index',

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',   
    
    'edit/([0-9]+)' => 'news/edit/$1',
    
    'delete/([0-9]+)' => 'news/delete/$1',
    
    'news/update' => 'news/update',
);

