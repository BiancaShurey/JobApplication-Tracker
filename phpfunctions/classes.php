
<?php
//this section defines the currentUser class
//the class provides a means of accessing any set cookies or session variables
class currentUser
{
	private $username;
	private $password;
	private $email;
	private $phone;
	private $cookieLife = 7*86400;

	function __construct()
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	}

	function setUsername($username)
	{
		//set the $username
		$_SESSION['username'] = $username;
		$this->username = $username;
	}

	function setPassword($password)
	{
		//set the $password
		$_SESSION['password'] = $password;
		$this->password = $password;
	}

	function setEmail($email)
	{
		//set the $email
		$_SESSION['email'] = $email;
		$this->email = $email;
	}

	function setPhone($phone)
	{
		//set the $phone
		$_SESSION['phone'] = $phone;
		$this->phone = $phone;
	}

	function setAll($username, $password, $email, $phone, $staySignedIn = 0)
	{
		//set the $username
		$_SESSION['username'] = $username;
		$this->username = $username;
		//set the $password
		$_SESSION['password'] = $password;
		$this->password = $password;
		//set the $email
		$_SESSION['email'] = $email;
		$this->email = $email;
		//set the $phone
		$_SESSION['phone'] = $phone;
		$this->phone = $phone;
		if ($staySignedIn)
		{
			//then we need to set Cookies
			//set the $username
			setcookie('username', $username, time() + $cookieLife, "/");
			//set the $password
			setcookie('password', $password, time() + $cookieLife, "/");
			//set the $email
			setcookie('email', $email, time() + $cookieLife, "/");
			//set the $phone
			setcookie('phone', $phone, time() + $cookieLife, "/");
		} else {
			//check if cookies already exist and therefore need to be updated
			if (isset($_COOKIE['username']))
			{
				setcookie('username', $username, time() + $cookieLife, "/");
			}
			if (isset($_COOKIE['password']))
			{
				setcookie('password', $password, time() + $cookieLife, "/");
			}
			if (isset($_COOKIE['email']))
			{
				setcookie('email', $email, time() + $cookieLife, "/");
			}
			if (isset($_COOKIE['phone']))
			{
				setcookie('phone', $phone, time() + $cookieLife, "/");
			}
		}
	}

	function username()	{
		if(isset($_SESSION['username'])) {
			return $_SESSION['username'];
		} elseif (isset($_COOKIE['username'])) {
			return $_COOKIE['username'];
		} else {
			return null;
		}
	}
	function password()	{
		if(isset($_SESSION['password'])) {
			return $_SESSION['password'];
		} elseif (isset($_COOKIE['password'])) {
			return $_COOKIE['password'];
		} else {
			return null;
		}
	}
	function email()	{
		if(isset($_SESSION['email'])) {
			return $_SESSION['email'];
		} elseif (isset($_COOKIE['email'])) {
			return $_COOKIE['email'];
		} else {
			return null;
		}
	}
	function phone()	{
		if(isset($_SESSION['phone'])) {
			return $_SESSION['phone'];
		} elseif (isset($_COOKIE['phone'])) {
			return $_COOKIE['phone'];
		} else {
			return null;
		}
	}
}
?>

<?php
class Application
{
	//this class represents a row from the Applications database table
	private $company;
	private $title;
	private $type;
	private $duration;
	private $site;
	private $released;
	private $closes;
	private $applied;
	private $selectionCriteria;
	private $hearFrom;
	private $location;
	private $commences;
	private $username;

	/*
	 * constructor method.
	 * Accepts a row from the result of an SQL query
	 */
	function __construct($row)
	{
		$this->company = $row['Company'];
		$this->title = $row['Title'];
		$this->type = $row['type'];
		$this->duration = $row['duration'];
		$this->site = $row['site'];
		$this->released = $row['released'];
		$this->closes = $row['closes'];
		$this->applied = $row['applied'];
		$this->selectionCriteria = $row['selection criteria'];
		$this->hearFrom = $row['hear fom'];
		$this->location = $row['location'];
		$this->commences = $row['commences'];
		$this->username = $row['username'];
	}

	/*
	 * method for getting company
	 */
	function company()	{ return $this->company; }

	/*
	 * method for getting title
	 */
	function title()	{ return $this->title; }
}
?>

<?php
class Event
{
	/*
	 * this class represents an event in the userCalendar
	 */

	//the fields that represent the attributes in the Applications table
	//of the database
	private $company;
	private $title;
	private $type;		//the type field from the Applications table
	private $duration;
	private $site;
	private $released;
	private $closes;
	private $applied;
	private $selectionCriteria;
	private $hearFrom;
	private $location;
	private $commences;
	private $username;

	//the fields that represent the other details about the Event
	private $classy;	//the category of the event ('released', 'closes', 'hearfrom')
	private $date;	//the date of the event

	/*
	 * constructor method.
	 * Row is a row from the result of an SQL query on the Applications table
	 * Type is a string representing the type of the event ('released', 'closes', 'hearfrom')
	 */
	function __construct($row, $classy)
	{
		//set the fields that represent attributes from the row
		$this->company = $row['Company'];
		$this->title = $row['Title'];
		$this->type = $row['type'];
		$this->duration = $row['duration'];
		$this->site = $row['site'];
		$this->released = $row['start'];
		$this->closes = $row['end'];
		$this->applied = $row['applied'];
		$this->selectionCriteria = $row['selection criteria'];
		$this->hearFrom = $row['hear from'];
		$this->location = $row['location'];
		$this->commences = $row['commences'];
		$this->username = $row['username'];

		//set the class and date of the event
		$this->classy = $classy;
		$this->date = $row[$classy];
	}

	/*
	 * provide a JSON object instance of the class
	 */
	function toJSON()
	{
		$json = array(
				'company' => $this->company,
				'title' => $this->title,
				'type' => $this->type,
				'duration' => $this->duration,
				'site' => $this->site,
				'released' => $this->released,
				'closes' => $this->closes,
				'applied' => $this->applied,
				'selectionCriteria' => $this->selectionCriteria,
				'hearFrom' => $this->hearFrom,
				'location' => $this->location,
				'commences' => $this->commences,
				'username' => $this->username,
				'classy' => $this->classy,
				'date' => $this->date,
		);
		return json_encode($json);
	}

	//getter functions
	function company() { return $this->company; }
	function title() { return $this->title; }
	function type() { return $this->type; }
	function duration() { return $this->duration; }
	function site() { return $this->site; }
	function released() { return $this->released; }
	function closes() { return $this->closes; }
	function applied() { return $this->applied; }
	function selectionCriteria() { return $this->selectionCriteria; }
	function hearFrom() { return $this->hearFrom; }
	function location() { return $this->location; }
	function commences() { return $this->commences; }
	function username() { return $this->username; }
	function classy() { return $this->classy; }
	function date() { return $this->date; }
}
?>

<?php
class monthEvents
{
	/*
	 * This class provides a means of accessing the user's application details
	 * for a given month
	 */

	private $username;
	private $month;

	function __construct($month, $username)
	{

		if (strlen($month) == 1)
		{
			$this->month = "0".$month;
		} else {
			$this->month = $month;
		}
		$this->username = $username;
	}

	/*
	 * returns the events for the month
	 * It accepts a string representing the month (1, 2, ....., 12).
	 * It returns an associatie array in the form:
	 *
	 * {date1:[event1, event2, ...]; date2:[event3, event4,...]; .....}
	 *
	 * where each event is a Event class object of the form:
	 *
	 * {company:'eg'; title:'eg'; type:'eg';....}
	 *
	 */
	function getEvents()
	{
		require 'config.php';

		$results = array();	//associative array for storing results (keys are dates and
		//values are lists of events on that date)

		// Create database connection
		$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
		//echo "TESTING..connection status is " .$conn->connect_errno ."<br/>";

		// Check database connection
		if ($conn->connect_error) {
			return null;
		}

		//create SQL query for applications released this month
		$sql = "SELECT * FROM applications WHERE username = '$this->username' AND MONTH(released) = $this->month";
		$released = $conn->query($sql);

		//create SQL query for applications closign this month
		$sql = "SELECT * FROM applications WHERE username = '$this->username' AND MONTH(closes) = $this->month";
		$closes = $conn->query($sql);

		//create SQL query for applications the user should be hearing from this month
		$sql = "SELECT * FROM applications WHERE username = '$this->username' AND MONTH(hearFrom) = $this->month";
		$hearFrom = $conn->query($sql);

		//create SQL query for applications commencing this month
		$sql = "SELECT * FROM applications WHERE username = '$this->username' AND MONTH(commences) = $this->month";
		$commences = $conn->query($sql);

		//check if database queries were successful
		if (!$released || !$closes || !$hearFrom || !$commences) {
			return null;
		}

		//add each of the SQL query results to the output JSON
		$results = $this->addResultsToOutput($released, 'released', $results);
		$results = $this->addResultsToOutput($closes, 'closes', $results);
		$results = $this->addResultsToOutput($hearFrom, 'hearFrom', $results);
		$results = $this->addResultsToOutput($commences, 'commences', $results);

		//close database connection
		$conn->close();

		//send the result
		//return json_encode($results);
		return $results;
	}

	/*
	 * adds the SQL query results to the results object
	 * $queryResult is a mysqli query result
	 * $eventClass is a string, either 'released', 'closes', 'hearFrom', or 'commences'
	 * $results is an associative array where the keys are dates and the values are instances of
	 * the Event class
	 */
	private function addResultsToOutput($queryResult, $eventClass, $results)
	{
		//iterate through queryResults, and add each result to the results
		while ($row = $queryResult->fetch_assoc())
		{
			$event = new Event($row, $eventClass);
			if (!array_key_exists($event->date(), $results))
			{
				//then this is the first event recorded for this date, so create a new list
				$list = array();
			} else {
				//there is already an event recorded for this date, so get the existing list
				$list = $results[$event->date()];
			}
			//add the even to the list
			//$list[] = $event->toJSON();
			$list[] = $event;
			//add the list to the  results array
			$results[$event->date()] = $list;
		}
		return $results;
	}
}
?>
