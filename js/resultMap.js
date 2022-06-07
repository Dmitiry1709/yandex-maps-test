ymaps.ready(init);
function init(){
  const myMap = new ymaps.Map("map", {
    center: [54.1961, 37.6182],
    zoom: 12
  });

  const objectManagerOptions = {
    clusterize: true,
    gridSize: 32,
    clusterDisableClickZoom: true
  };

  const objectManagerDefault = new ymaps.ObjectManager(objectManagerOptions),
        objectManagerRed = new ymaps.ObjectManager(objectManagerOptions),
        objectManagerYellow = new ymaps.ObjectManager(objectManagerOptions),
        objectManagerBlue = new ymaps.ObjectManager(objectManagerOptions),
        objectManagerGreen = new ymaps.ObjectManager(objectManagerOptions);

  objectManagerDefault.objects.options.set('preset', 'islands#grayDotIcon');
  objectManagerDefault.clusters.options.set('preset', 'islands#grayClusterIcons');

  objectManagerRed.objects.options.set('preset', 'islands#redDotIcon');
  objectManagerRed.clusters.options.set('preset', 'islands#redClusterIcons');

  objectManagerYellow.objects.options.set('preset', 'islands#yellowDotIcon');
  objectManagerYellow.clusters.options.set('preset', 'islands#yellowClusterIcons');

  objectManagerBlue.objects.options.set('preset', 'islands#blueDotIcon');
  objectManagerBlue.clusters.options.set('preset', 'islands#blueClusterIcons');

  objectManagerGreen.objects.options.set('preset', 'islands#greenDotIcon');
  objectManagerGreen.clusters.options.set('preset', 'islands#greenClusterIcons');

  myMap.geoObjects.add(objectManagerDefault);
  myMap.geoObjects.add(objectManagerRed);
  myMap.geoObjects.add(objectManagerYellow);
  myMap.geoObjects.add(objectManagerBlue);
  myMap.geoObjects.add(objectManagerGreen);

  objectManagerDefault.add({
    ...window.features,
    "features" : window.features.features.filter(feature => feature.quality === 'DEFAULT')
  });
  objectManagerRed.add({
    ...window.features,
    "features" : window.features.features.filter(feature => feature.quality === 'Плохо')
  });
  objectManagerYellow.add({
    ...window.features,
    "features" : window.features.features.filter(feature => feature.quality === 'Удовлетворительно')
  });
  objectManagerBlue.add({
    ...window.features,
    "features" : window.features.features.filter(feature => feature.quality === 'Хорошо')
  });
  objectManagerGreen.add({
    ...window.features,
    "features" : window.features.features.filter(feature => feature.quality === 'Отлично')
  });
}