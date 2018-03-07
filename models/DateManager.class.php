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
		$query = $this->pdo->query("SELECT * FROM dates");
		$dates = $query->fetchAll(PDO::FETCH_CLASS, 'Date', [$this->pdo]);
		return $dates;
	}
	public function findNextMonth()
	{
		$query = $this->pdo->query("SELECT * FROM dates where date > now() and DATE_ADD(date, INTERVAL 30 DAY)");
		$dates = $query->fetchAll(PDO::FETCH_CLASS, 'Date', [$this->pdo]);
		return $dates;
	}
	public function findDate($date)
	{
		$query = $this->pdo->prepare("SELECT * FROM dates where date = ?");
		$query->execute([$date]);
		return $query->fetchObject('Date', [$this->pdo]);
	}
	public function genDate()
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
				$o = $this->findDate($d->format('Y-m-d')); //stockage de la date au format SQL 
				
				if ($o && $d->format('w') != 3 ) // date présente dans la base (donc = congés)
				{
					if ($o->getMiday() != 0)
					{
						$listdate[] = [
							'date' => $d->format('d/m/Y'),
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
							'date' => $d->format('d/m/Y'),
							'jour' => $d->format('w'),
							'conges' => '1'
						];
						$i++;
					}
				}
				else if (empty($o) && $d->format('w') == 3)
				{
					$listdate[] = [
						'date' => $d->format('d/m/Y'),
						'jour' => $d->format('w'),
						'conges' => '1'
					];
					$i++;
				}
				else
				{
					$listdate[] = [
						'date' => $d->format('d/m/Y'),
						'jour' => $d->format('w'),
						'conges' => '0'
					];
					$i++;
				}
			}
		}
		return $listdate; //array
	}

	public function listDate()
	{
		$dates = $this->genDate();
		$i = 0;
		$res = Array();
		
		foreach ($dates as $date)
		{
    		if ($date['conges'] == 0)
    		{
			
    		    for ($i = 11; $i < 14;$i++)
    		    {
    		        $res[] = $date['date'].' '.$i.':00';
    		    }
    		    for ($i = 18; $i < 24;$i++)
    		    {
    		        $res[] = $date['date'].' '.$i.':00';
    		    }
    		}
    		else if ($date['conges'] == 1)
    		{
    		    for ($i = 18; $i < 24;$i++)
    		    {
    		        $res[] = $date['date'].' '.$i.':00';
    		    }
    		}
    		else if ($date['conges'] == 2)
    		{
    		    for ($i = 11; $i < 14;$i++)
    		    {
    		        $res[] = $date['date'].' '.$i.':00';
    		    }
    		}

		}
		return $res;
	}

	public function addDate($date,$miday)
	{
		$user = new Date($this->pdo);
		$user->setDate($date);
		$user->setMiday($miday);
		$query = $this->pdo->prepare("INSERT INTO dates (date, miday) VALUES(?, ?)");
		$query->execute([$user->getDate(), $user->getMiday()]);
		$date = $this->pdo->lastInsertId();
		return $this->findDate($date);
	}

	public function rmDate(Date $date)
	{
		$query = $this->pdo->prepare("DELETE FROM users WHERE date = ?");
		$query->execute([$date->getDate()]);
	}
}
