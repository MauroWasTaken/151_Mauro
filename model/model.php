<?php
/**
 * Author   : nicolas.glassey@cpnv.ch
 * Project  : 151_2019_ForStudents
 * Created  : 05.02.2019 - 18:40
 *
 * Git source  :    [link]
 */

/**
 * Create a PDO connection to the database
 *
 * @return PDO|null
 */
function connectDtb()
{
  $tempDbConnection = null;

  //region PDO infos
  //region DSN infos
  $sqlDriver = 'mysql';
  $hostname = 'localhost';
  $dbName = 'snows';
  $port = 3306;
  $charset = 'utf8';
  //endregion
  $dsn = 'mysql:host=localhost;port=3306;dbname=snows;charset=utf8';

  // Changer ces infos chez vous
  $userName = 'snows_admin';
  $userPwd = 'snows-cpnv';
  //endregion

  //region PDO connection
  try {
    $tempDbConnection = new PDO($dsn, $userName, $userPwd);
  } catch (PDOException $exception) {
    echo 'Connection failed: ' . $exception->getMessage();
  }

  //endregion

  return $tempDbConnection;
}

/**
 * Execute a sent query. You can send or not an array for the PDO execution
 *
 * @param      $query
 * @param null $queryArray
 * @return array|null
 */
function executeQuery($query, $queryArray = null)
{
  $queryResult = null;

  $dbConnexion = connectDtb();

  if ($dbConnexion != null) {
    $statement = $dbConnexion->prepare($query);
    $statement->execute($queryArray);
    $queryResult = $statement->fetchAll();
  }

  $dbConnexion = null;

  return $queryResult;
}

/**
 * Verify if the user's infos match with the database's infos
 *
 * @param $userData
 * @return bool
 */
function getUserLogin($userData)
{
  $flag = false;

  $query = "SELECT * FROM users WHERE pseudo = :pseudo AND userPsw = :userPsw";

  $queryArray = [
    'pseudo' => $userData['inputPseudo'],
    'userPsw' => $userData['inputPassword']
  ];
  $userLogged = executeQuery($query, $queryArray)[0];
  //password_hash($userLogged['userPsw'], PASSWORD_DEFAULT); // Pour conna'itre le hash et ensuite le copier dans la base de données (à retirer une fois fait)
  // password_verify($userData['inputPassword'], $hashTest2);

  return $flag;
}
function getSnows(){
    return 0;
}