<?php
die();
// Remove a sessão
if (!isset($_SESSION)) session_start();
session_unset();
session_destroy();

const HOME_URL = "/login";
