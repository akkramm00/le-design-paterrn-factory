<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?php
// Le principe : Une classe "chef d'orchestre":
// = Une classe factory est une classe dont le role estd'instancier d'autres classes pour une situationdonnée.
// Grace a ce type de classes , la logique d'instanciation d'un objet se retrouve déportée et sera toujours la meme.

abstract class Notification
  {
    protected abstract function(string $message);// tout type de notification doit implémenter une methode send()
    public function managerNotification($message)
    {
      $this -> doStuff();
      $this -> send($message);// qu'importe le type de notification, on effectuera des actoions préalables et on envoieun message
    }

    public function doStuff()
    {
      // on pourrait logger des informations
    }
  }

?> 


  </body>
</html>