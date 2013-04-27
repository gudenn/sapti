<?php
  global $SYSTEM_NAME,$SESSION_TIME;
  $SYSTEM_NAME  = 'PROYECTOFINAL';
  $SESSION_TIME = 60*60; //

/**
 * Inicia la session
 */
function initSession($login, $passwd) {
  global $SYSTEM_NAME,$SESSION_TIME;
  leerClase("Usuario");
  $user = new Usuario();
  $user = $user->issetUser($login, $passwd);
  if ($user) {
    saveObject($user, "$SYSTEM_NAME-USER");
    setcookie("$SYSTEM_NAME-USER", $login, time() + $SESSION_TIME, '/');
    return true;
  }
  else
    return false;
}

/**
 * Inicia la session
 */
function initAdminSession($login, $passwd) {
  global $SYSTEM_NAME,$SESSION_TIME;
  leerClase("Administrador");
  $admin = new Administrador();
  $admin = $admin->issetAdmin($login, $passwd);
  if ($admin) {
    saveObject($admin, "$SYSTEM_NAME-ADMIN");
    setcookie("$SYSTEM_NAME-ADMIN", $login, time() + $SESSION_TIME, '/');
    return true;
  }
  else
    return false;
}


function isUserSession() {
  global $SYSTEM_NAME,$SESSION_TIME;
  if(!isset($_SESSION))
    session_start();
  if ( !isset($_COOKIE["$SYSTEM_NAME-USER"]) )
  {
    closeSession();
    return 0;
  }

  // renovamos en tiempo de la session pq hay actividad del usuario
  $login = $_COOKIE["$SYSTEM_NAME-USER"];
  setcookie("$SYSTEM_NAME-USER", $login, time() + $SESSION_TIME, '/');

  return isset($_SESSION["$SYSTEM_NAME-USER"]) ? 1 : 0;
}

function isAdminSession() {
  global $SYSTEM_NAME,$SESSION_TIME;
  if(!isset($_SESSION))
    session_start();
  if ( !isset($_COOKIE["$SYSTEM_NAME-ADMIN"]) )
  {
    closeAdminSession();
    return 0;
  }
  // renovamos en tiempo de la session pq hay actividad del usuario
  $login = $_COOKIE["$SYSTEM_NAME-ADMIN"];
  setcookie("$SYSTEM_NAME-ADMIN", $login, time() + $SESSION_TIME, '/');

  return isset($_SESSION["$SYSTEM_NAME-ADMIN"]) ? 1 : 0;
}


function getSessionUser() {
  global $SYSTEM_NAME;
  if (isUserSession()) {
    return loadObject("$SYSTEM_NAME-USER");
  }
  else {
    return 0;
  }
}

function getSessionAdmin() {
  global $SYSTEM_NAME;
  if (isAdminSession()) {
    return loadObject("$SYSTEM_NAME-ADMIN");
  }
  else {
    return 0;
  }
}

function saveObject($object, $name) {
  $_SESSION[$name] = serialize($object);
}

function loadObject($name) {
  if (!isset($_SESSION[$name])) return "EMPTY";
  return unserialize($_SESSION[$name]);
}

function closeSession() {
  global $SYSTEM_NAME,$SESSION_TIME;
  if(isset($_SESSION)) {
    setcookie("$SYSTEM_NAME-USER", "" , 1 - ($SESSION_TIME * 2), '/');
    unset($_SESSION["$SYSTEM_NAME-USER"]);
  }
}

function closeAdminSession() {
  global $SYSTEM_NAME,$SESSION_TIME;
  if(isset($_SESSION)) {
    setcookie("$SYSTEM_NAME-ADMIN", "" , 1 - ($SESSION_TIME * 2), '/');
    unset($_SESSION["$SYSTEM_NAME-ADMIN"]);
  }
}

function getIP() {
  if (getenv("HTTP_X_FORWARDED_FOR"))
    return getenv("HTTP_X_FORWARDED_FOR");
  return getenv("REMOTE_ADDR");
}

?>