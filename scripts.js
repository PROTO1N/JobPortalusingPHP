document.addEventListener("DOMContentLoaded", function () {
    let lastScrollTop = 0;
    const header = document.querySelector("header");
  
    window.addEventListener("scroll", function () {
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      if (scrollTop > lastScrollTop) {
        header.style.top = "-100px"; // Hide header on scroll down
      } else {
        header.style.top = "0"; // Show header on scroll up
      }
      lastScrollTop = scrollTop;
    });
  
    fetch("fetch_opportunities.php")
      .then((response) => response.json())
      .then((data) => {
        const container = document.getElementById("opportunities-container");
        data.forEach((opportunity) => {
          const div = document.createElement("div");
          div.classList.add("opportunity");
          div.innerHTML = `
            <img src="${opportunity.image_url}" alt="${opportunity.title}">
            <h3>${opportunity.title}</h3>
            <p>${opportunity.description}</p>
            <p>Deadline: ${new Date(opportunity.deadline).toLocaleDateString()}</p>
          `;
          container.appendChild(div);
        });
      })
      .catch((error) =>
        console.error("Error fetching opportunities:", error)
      );
  });
  