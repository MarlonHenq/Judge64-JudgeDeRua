<?php

function generateToken() {
    return bin2hex(random_bytes(16));
}