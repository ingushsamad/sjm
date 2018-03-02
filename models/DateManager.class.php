<?php


class DateManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM dates where date > now() and DATE_ADD(date, INTERVAL 30 DAY)");
		$date = $query->fetchAll(PDO::FETCH_CLASS, 'Date', [$this->pdo]);
		return $date;
	}
	public function checkDate($date)
	{
		$query = $this->pdo->prepare("SELECT * FROM dates where date = ?");
		$query->execute([$date]);
		return $query->fetchObject('Date', [$this->pdo]);
	}
	public function listDate()
	{
		$d = new DateTime(); // aujourd'hui
		$interval = new DateInterval('P1D'); // interval d'un jour

		$listdate = array();
		$i = 0;

		while ($i < 30)
		{
			$d->add($interval);

			if ($d->format('w') != 1 && $d->format('w') != 2) // comparaison des jours non travaillés
			{
				$o = $this->checkDate($d->format('Y-m-d'));
			
				if ($o && $d->format('w') != 3 ) // date présente dans la base (donc = congés)
				{
					if ($o->getMiday() != 0)
					{
						$listdate[] = [
							'date' => $d->format('d/n/Y'),
							'jour' => $d->format('w'),
							'conges' => $o->getMiday()
						];
						$i++;
					}
				}
				else if ($o && $d->format('w') == 3)
				{
					if ($o->getMiday() == 1)
					{
						$listdate[] = [
							'date' => $d->format('d/n/Y'),
							'jour' => $d->format('w'),
							'conges' => '1'
						];
						$i++;
					}
				}
				else
				{
					$listdate[] = [
						'date' => $d->format('d/n/Y'),
						'jour' => $d->format('w'),
						'conges' => '0'
					];
					$i++;
				}
			}
		}
		return $listdate;
	}

}

$dsn = 'mysql:dbname=restaurant;host=192.168.1.91';
$db_user = "restaurant";
$db_password = "ULaicha6ei";
$pdo = new PDO($dsn, $db_user, $db_password);
require("Date.class.php");

$ex = new DateManager($pdo);
var_dump($ex->listDate());
