<?php

if(isset($HTTP_POST["submit"])) {
    header("Location: html/star.html");
} else {
    header("location: html/main.html");
}
