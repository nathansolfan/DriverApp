<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Routes Index
Breadcrumbs::for('routes.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Routes', route('routes.index'));
});

// Bookings Index
Breadcrumbs::for('bookings.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Bookings', route('bookings.index'));
});

// Booking Create
Breadcrumbs::for('bookings.create', function (BreadcrumbTrail $trail) {
    $trail->parent('bookings.index');
    $trail->push('Create Booking', route('bookings.create'));
});


// Payments Index
Breadcrumbs::for('payments.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Payments', route('payments.index'));
});

// Booking Edit
Breadcrumbs::for('bookings.edit', function (BreadcrumbTrail $trail, $booking) {
    $trail->parent('bookings.index');
    $trail->push('Edit Booking', route('bookings.edit', $booking));
});


// Calendar View
Breadcrumbs::for('bookings.calendar', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Booking Calendar', route('bookings.calendar'));
});
