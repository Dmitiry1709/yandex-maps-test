<p class="text-center my-5">На карте представлены результаты опроса</p>
<div class="d-flex align-items-center justify-content-center">
    <div id="map" style="width: 1000px; height: 600px"></div>
</div>

<script>
  window.features = {
    "type": "FeatureCollection",
    "features": [
        <?foreach($data['RESULTS'] as $key => $RESULT):?>
            {
              "type": "Feature",
              "id": <?=$key?>,
              "geometry": {
                "type": "Point",
                "coordinates": [<?=$RESULT['LAT']?>, <?=$RESULT['LON']?>]
              },
              "properties": {
                "balloonContentHeader": "Результат",
                "balloonContentBody": `
                    <ul class="list-group">
                        <li class="list-group-item">Email: <?=htmlspecialchars($RESULT['EMAIL'])?></li>
                        <li class="list-group-item">Адрес: <?=htmlspecialchars($RESULT['ADDRESS'])?></li>
                        <li class="list-group-item">Качество: <?=htmlspecialchars($RESULT['QUALITY'])?></li>
                    </ul>`,
                "clusterCaption": "<strong><?=htmlspecialchars($RESULT['ADDRESS'])?><strong>",
                "balloonContentFooter": `<sup>Координаты: <?=htmlspecialchars($RESULT['LAT'])?>, <?=htmlspecialchars($RESULT['LON'])?></sup>`
              },
              "quality":  <?=$RESULT['QUALITY'] ? '"'.$RESULT['QUALITY'].'"' : '"DEFAULT"'?>
            },
        <?endforeach;?>
    ]
  }
</script>
<script src="https://api-maps.yandex.ru/2.1/?apikey=829a44e2-2a1a-4aa9-9bbc-758fae4dc0f7&lang=ru_RU" type="text/javascript">
</script>
<script src='/js/resultMap.js?time=<?=time()?>'></script>