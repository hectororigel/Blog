<?php

function Flash($message) {
    session()->flash('message', $message);
};