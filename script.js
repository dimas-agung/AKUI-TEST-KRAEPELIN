const table = document.getElementById("dataTable");
const labels = [];
const data1 = [];
let totalBenar = 0;
let totalSalah = 0;

// Clear existing rows in the table
while (table.rows.length > 1) {
  table.deleteRow(1);
}

for (let i = 1; i <= 50; i++) {
  const benarKey = "jBenar" + i;
  const salahKey = "jSalah" + i;

  // Retrieve data from localStorage
  const benarValue = parseInt(localStorage.getItem(benarKey) || 0);
  const salahValue = parseInt(localStorage.getItem(salahKey) || 0);

  // Calculate total and update overall totals
  const total = benarValue + salahValue;
  totalBenar += benarValue;
  totalSalah += salahValue;

  // Populate table rows
  const row = table.insertRow(-1);
  const cell1 = row.insertCell(0);
  const cell2 = row.insertCell(1);
  const cell3 = row.insertCell(2);
  const cell4 = row.insertCell(3);

  cell1.innerHTML = i;
  cell2.innerHTML = benarValue;
  cell3.innerHTML = salahValue;
  cell4.innerHTML = total;

  // Populate chart data
  labels.push(i.toString());
  data1.push(total);
}

// Update the totals in the table
document.getElementById("hasil-benar").innerText = totalBenar;
document.getElementById("hasil-salah").innerHTML = totalSalah;
document.getElementById("hasil-total").innerHTML = totalSalah + totalBenar;

// Initialize and update the chart
const ctx = document.getElementById("myChart").getContext("2d");
const myChart = new Chart(ctx, {
  type: "line",
  data: {
    labels: labels,
    datasets: [
      {
        label: "# of Votes",
        data: data1,
        borderWidth: 1,
      },
    ],
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
});
