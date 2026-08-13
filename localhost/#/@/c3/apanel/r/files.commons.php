<?php
function X($X){ return preg_replace(['/[\/\\\]+/', '/(^|[\/])\.+([\/]|$)/', '/^\/|\/$/'], ['/', '', ''], $X); }
function Y($P){ $X = strrpos($P, '.'); return (($X !== false) ? strtolower(substr($P, ($X + 1))) : ''); }
?>