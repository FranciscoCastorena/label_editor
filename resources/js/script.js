    

// Resize cv

const buildZone = document.getElementById('buildZone');
const wrapper = document.getElementById('wrapper');
const paddingShift = 60;


// Clear cv - Delete shapes

document.getElementById('clear').addEventListener('click', () => {
  !deleteActiveObjects() && cv.clear();
  cv.setBackgroundImage(bgImg, cv.renderAll.bind(cv), {
    scaleX: cv.width / img.width,
    scaleY: cv.height / img.height,
    opacity: 0.5,
});

cv.renderAll();
});

document.addEventListener('keydown', event => {
  event.keyCode === 46 && deleteActiveObjects();
});

function deleteActiveObjects() {
  const activeObjects = cv.getActiveObjects();
  if (!activeObjects.length) return false;

  if (activeObjects.length) {
    activeObjects.forEach(function (object) {
      cv.remove(object);
    });
  } else {
    cv.remove(activeObjects);
  }

  return true;
}


// SHAPES STYLES  ―――――――――――――――――――――――――

const styleZone = document.getElementById('styleZone');
const colorss = ['#43c8bf', '#896bc8', '#e54f6b'];
let defaultColor = colorss[0];
let activeElement = null;
const isSelectedClass = 'isSelected';

colorss.forEach((color, i) => {
  const span = document.createElement('span');
  span.style.background = color;

  if (i === 0) {
    span.className = isSelectedClass;
    activeElement = span;
  }

  let icon = document.createElement('i');
  icon.className = 'feather icon-check';
  span.appendChild(icon);

  styleZone.appendChild(span);

  span.addEventListener('click', event => {
    if (span.className !== isSelectedClass) {
      span.classList.toggle(isSelectedClass);
      activeElement.classList.remove(isSelectedClass);
      activeElement = span;
      strokeColor = color;
    }

    if (cv.getActiveObject()) {
      const activeObjects = cv.getActiveObjects();
      if (!activeObjects.length) return;

      activeObjects.forEach(function (object) {
        object.set('stroke', strokeColor);
      });

      cv.renderAll();
    }
  });
});


// SHAPES CREATION  ―――――――――――――――――――――――――

let strokeWidth = 2;
let strokeColor = defaultColor;

// Square

document.getElementById('square').addEventListener('click', () => {
  cv.add(new fabric.Rect({
    strokeWidth: strokeWidth,
    stroke: strokeColor,
    fill: 'transparent',
    width: 50,
    height: 50,
    left: 100,
    top: 100 }));

});

// Circle

document.getElementById('circle').addEventListener('click', () => {
  cv.add(new fabric.Circle({
    radius: 30,
    strokeWidth: strokeWidth,
    stroke: strokeColor,
    fill: 'transparent',
    left: 100,
    top: 100 }));

});

// Triangle

document.getElementById('triangle').addEventListener('click', () => {
  cv.add(new fabric.Triangle({
    strokeWidth: strokeWidth,
    stroke: strokeColor,
    fill: 'transparent',
    width: 50,
    height: 50,
    left: 100,
    top: 100 }));

});