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
    protected abstract function send(string $message);// tout type de notification doit implémenter une methode send()
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
  class EmailNotification extends Notification
    {
      public $recipient;
      public $subject;
      public function __construct()
      {
    $this-> recipient = "contact@societe.com";
    $this->subject = 'Etat applicatif';
      }

// La méthode sebd dans ce cas envoie un e-mail
     protected function send(string $message)
       {
         echo sprintf('On envoie le mail ayant pour contenu "%s" au contact              "%s" avec pour sujet : %s<br>' , $message, $this-> recipient, $this-> subject);
       }
    }
class SlackNotification extends Notification
  {
    public $channel;
    public function __construct()
    {
  $this->channel = "#applicationState";
    }
public function doStuff()
  {
    parent::doStuff();
    //do something else
  }
// ici on poste le message sur le canal
protected function send(string $message)
  {
    echo sprintf('On notifie le canal %s du message : %s <br>',
                $this->channel, $message);
  }
  }

class NotificationFactory
  {
    // Selon l'etat, on décide de renvoyer un type de notification ou un autre
    public static function creatNotificationForState(string $applicationState)
    {
      switch ($applicationState) {
        case 'problem':
        return new SlackNotification();
        case 'normal':
        defaullt:
        return new EmùailNotification();
      }
    }
  }
$notification1 =
  NotificationFactory::creatNotification('problem');
// Affichera: On notifie le canal #applicationState du message : La base de données est innaccessible
$notification2 = 
  NitifivcationFactory:: creatNotificationForstate('normal');
// Affichera : On envoie le mail ayant pour co,tenu  "Tout va bien " au contact "contact@societe.com" avec pour sujet : Etat applicatif
$notification2-> manageNotification('Tout va bien');

// Qu'importe ce qui a pu etere retourné, on effectue le travail de lameme facon
?> 


  </body>
</html>