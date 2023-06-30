<?php
// File mandatory to secure pages access
session_start();
if (!isset($_SESSION["connected"]) || $_SESSION["connected"] != "ok") {
    header("Location: ../index.php");
}