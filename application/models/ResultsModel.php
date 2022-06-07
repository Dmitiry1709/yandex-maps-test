<?php

class ResultsModel extends Model
{
	
	public function getResults()
	{
        if (($fp = fopen("export.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($fp, 0, ";")) !== FALSE) {
                $result = explode('|', $data[0]);
                $list[] = [
                    'EMAIL' =>   $result[0],
                    'ADDRESS' =>   $result[1],
                    'QUALITY' =>   $result[2],
                    'LAT' =>   $result[3],
                    'LON' =>   $result[4],
                ];
            }
            fclose($fp);
        }

        unset($list[0]);

        return $list;
	}

    public function addResult()
    {
        $fp = fopen('export.csv', 'a');
        fputcsv($fp, [
            htmlspecialchars($_REQUEST['email']),
            htmlspecialchars($_REQUEST['address']),
            htmlspecialchars($_REQUEST['quality']),
            htmlspecialchars($_REQUEST['lat']),
            htmlspecialchars($_REQUEST['lon']),
        ], '|');
        fclose($fp);
    }
}
