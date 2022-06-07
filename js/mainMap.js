ymaps.ready(init);
function init(){
  const myMap = new ymaps.Map("map", {
    center: [54.1961, 37.6182],
    zoom: 12
  });
  myMap.events.add('click', function (e) {
    if (!myMap.balloon.isOpen()) {
      var coords = e.get('coords');
      myMap.balloon.open(coords, {
        contentHeader:'Оставить отзыв',
        contentBody: `
          <form method="post" action="/result">
            <div class="form-group my-2">
              <input name="email" required type="email" class="form-control" id="inputEmail" placeholder="Введите Email">
            </div>
            <div class="form-group my-2">
              <input name="address" required type="text" class="form-control" id="inputAddress" placeholder="Введите адрес">
            </div>
            <div class="form-group my-2">
              <select name="quality" required id="inputQuality" class="form-control">
                <option selected disabled>Выберите качество...</option>
                <option>Плохо</option>
                <option>Удовлетворительно</option>
                <option>Хорошо</option>
                <option>Отлично</option>                
              </select>
            </div>
            <input type="hidden" name="lat" value="${coords[0].toPrecision(6)}">
            <input type="hidden" name="lon" value="${coords[1].toPrecision(6)}">
            <button type="submit" class="btn btn-primary">Отправить</button>
          </form>
        `,
        contentFooter: `<sup>Координаты: ${coords[0].toPrecision(6)}, ${coords[1].toPrecision(6)}</sup>`
      });
    }
    else {
      myMap.balloon.close();
    }
  });
}