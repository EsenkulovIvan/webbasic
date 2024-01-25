<?php

return [
    '#^auth/(?<template>user)/(?<render>reg)$#' => ['controller' => \App\Controllers\UserController::class, 'method' => 'register'],
    '#^auth/(?<template>user)/(?<render>log)$#' => ['controller' => \App\Controllers\UserController::class, 'method' => 'logIn'],
    '#^content/(?<template>profile)/(?<render>list)$#' => ['controller' => \App\Controllers\ProfileController::class, 'method' => 'mainList'],
    '#^content/(?<template>profile)/(?<render>questionnaire)$#' => ['controller' =>\App\Controllers\ProfileController::class, 'method' => 'questionnaire'],
'#^content/(?<template>workwithprofile)/(?<render>look)$#' => ['controller' =>\App\Controllers\ProfileController::class, 'method' => 'lookList'],
    '#^content/(?<template>workwithprofile)/(?<render>redactor)$#' => ['controller' =>\App\Controllers\ProfileController::class, 'method' => 'redactorList'],
    '#^content/(?<template>workwithprofile)/(?<render>delete)$#' => ['controller' =>\App\Controllers\UserController::class, 'method' => 'deleteAccount'],
'#^$#' => ['controller' =>\App\Controllers\ProfileController::class, 'method' => 'mainList'],
    '#^content/(?<template>user)/out$#' => ['controller' => \App\Controllers\UserController::class, 'method' => 'logOut'],
];