const init = () => {
  console.log("Hello World!");
  _initCookies();
};

const getCookie = (cookie) => {
  return (cookieValue = document.cookie
    .split("; ")
    .find((row) => row.startsWith(`${cookie}=`))
    ?.split("=")[1]);
};

const _initCookies = () => {
  let url = "./server.php";
  fetch(url)
    .then((response) => {
      return response.json();
    })
    .then((products) => {
      document.cookie = `products=${JSON.stringify(products)}`;
    });
};

window.addEventListener("DOMContentLoaded", init);
