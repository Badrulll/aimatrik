<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('telescope:prune --hours=168')->daily();
