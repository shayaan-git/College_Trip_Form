if (window.location.search.includes("success=1")) {
  setTimeout(() => {
    // window.history.replaceState(null, null, window.location.pathname);
    window.location.replace("index.php");
  }, 5000);
}