// ボタンの処理
let button = document.querySelector('button#btn');
button.addEventListener('click', function() {
    justDoIt();
});

document.addEventListener('DOMContentLoaded', justDoIt);

function justDoIt() {
    alert('とにかくやってみよう！');
}