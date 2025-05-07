document.getElementById("filter").addEventListener("change", function () {
    const selected = this.value;
    const items = document.querySelectorAll(".item");
  
    items.forEach(item => {
      if (selected === "all") {
        item.style.display = "flex";
      } else if (item.classList.contains(selected)) {
        item.style.display = "flex";
      } else {
        item.style.display = "none";
      }
    });
  });
