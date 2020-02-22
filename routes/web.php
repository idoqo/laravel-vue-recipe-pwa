<?php

Route::get('/{any}', 'Controller@index')->where('any', '.*');
