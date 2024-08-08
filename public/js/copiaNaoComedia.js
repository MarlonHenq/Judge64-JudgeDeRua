// Função: Bloquear o CTRL C e CTRL V
document.oncontextmenu = new Function("return false");
document.onselectstart = new Function("return false");

// document.onkeydown = function(e) {
//     if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85)) {
//         return false;
//     } else {
//         return true;
//     }
// };