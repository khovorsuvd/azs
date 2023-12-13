import "./App.css";
function SaveBd() {
  function saveBdButton() {
    
    fetch("http://azs.localhost/saveBD.php", {
      method: 'POST',
      header: {
        "Content-Type": 'multipart/form-data',
      },
      body: "savebd"
    })
      .then(response => response.text())
      .then(response => console.log(response));
  }

  return (<button onClick={saveBdButton}>
    Создать резервную копию</button>
  )
}
export default SaveBd;