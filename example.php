<?php
// Date Frequency Calculator and Public Holiday Checker
// By Tom Kavanagh https://github.com/tkav/php-date-frequency

include('src/datefrequency.php');

//3 months from date
$nextOccurrence = DateFrequency::nextOccurrence('08-05-2018', '3', 'months');
echo '<br>'.$nextOccurrence;

//3 months from date and the preferred day of the month
$nextOccurrence = DateFrequency::nextOccurrence('08-05-2018', '3', 'months', 'third wednesday');
echo '<br>'.$nextOccurrence;

//custom format
$nextOccurrence = DateFrequency::nextOccurrence('08-05-2018', '3', 'months', 'third wednesday', 'Ymd');
echo '<br>'.$nextOccurrence;

//check if date is a public holiday
$isholiday = publicHoliday::isHoliday('13-12-2018');
echo '<br>'.$isholiday;

$isholiday = publicHoliday::isHoliday('25-12-2018');
echo '<br>'.$isholiday;

//get name of public holiday
$holidayName = publicHoliday::holidayName('25-12-2018');
echo '<br>'.$holidayName;
?>
