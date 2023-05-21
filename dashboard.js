function animateValue(obj, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
      if (!startTimestamp) startTimestamp = timestamp;
      const progress = Math.min((timestamp - startTimestamp) / duration, 1);
      obj.innerHTML = Math.floor(progress * (end - start) + start);
      if (progress < 1) {
        window.requestAnimationFrame(step);
      }
    };
    window.requestAnimationFrame(step);
  }
  
  const counts = document.querySelectorAll(".count");
  counts.forEach((count) => {
    animateValue(count, 0, count.getAttribute("data-count"), 2000);
  });

  document.addEventListener("DOMContentLoaded", function () {
    const barData = {
      labels: ["Art", "Fashion", "Jewelry"],
      datasets: [
        {
          label: "Sales",
          data: [500, 1000, 750],
          backgroundColor: ["#5cb85c", "#f0ad4e", "#5bc0de"],
        },
      ],
    };
  
    const pieData = {
      labels: ["Art", "Fashion", "Jewelry"],
      datasets: [
        {
          data: [500, 1000, 750],
          backgroundColor: ["#5cb85c", "#f0ad4e", "#5bc0de"],
        },
      ],
    };
  
    const barCtx = document.getElementById("bar-chart").getContext("2d");
    new Chart(barCtx, {
      type: "bar",
      data: barData,
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    });
  
    const pieCtx = document.getElementById("pie-chart").getContext("2d");
    new Chart(pieCtx, {
      type: "pie",
      data: pieData,
      options: {
        responsive: true,
      },
    });
  });