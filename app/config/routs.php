<?php

return [
    '#^auth/(?<template>user)/(reg)$#' => ['controller' => \App\Controllers\UserController::class, 'method' => 'register'],
    '#^auth/(?<template>user)/(log)$#' => ['controller' => \App\Controllers\UserController::class, 'method' => 'logIn'],
    '#^auth/(?<template>profile)/(list)$#' => ['controller' => \App\Controllers\ProfileController::class, 'method' => 'logIn'],
    '#^auth/(?<template>profile)/(questionnaire)$#' => ['controller' => \App\Controllers\ProfileController::class, 'method' => 'logIn'],

];