<?php

use PHPUnit\Framework\ExpectationFailedException;
use Tests\Models\User;

test('pass', function () {
    $user1 = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    $user2 = User::find($user1->getKey());

    expect($user1)->toBeSameModel($user2);
});

test('not pass', function () {
    $user1 = User::create([
        'name'     => 'test user 1',
        'email'    => 'email1@test.xx',
        'password' => Hash::make('password'),
    ]);

    $user2 = User::create([
        'name'     => 'test user 2',
        'email'    => 'email2@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect($user1)->not->toBeSameModel($user2);
});

test('fails', function () {
    $user1 = User::create([
        'name'     => 'test user 1',
        'email'    => 'email1@test.xx',
        'password' => Hash::make('password'),
    ]);

    $user2 = User::create([
        'name'     => 'test user 2',
        'email'    => 'email2@test.xx',
        'password' => Hash::make('password'),
    ]);

    expect($user1)->toBeSameModel($user2);
})->throws(ExpectationFailedException::class);

test('not fails', function () {
    $user1 = User::create([
        'name'     => 'test user',
        'email'    => 'email@test.xx',
        'password' => Hash::make('password'),
    ]);

    $user2 = User::find($user1->getKey());

    expect($user1)->not->toBeSameModel($user2);
})->throws(ExpectationFailedException::class);
