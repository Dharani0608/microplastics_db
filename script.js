$(document).ready(function () {
    // Apply filtering when button is clicked
    $("#filterBtn").click(function () {
        var ecosystem = $("#ecosystemFilter").val();
        var polymer = $("#polymerFilter").val();

        $.ajax({
            url: "fetch_data.php",
            method: "POST",
            data: { ecosystem: ecosystem, polymer: polymer },
            success: function (data) {
                $("#dataTable").html(data);
            }
        });
    });

    // Handle Get Chart button click
    $(document).on("click", ".getChartBtn", function () {
        var id = $(this).data("id");

        $.ajax({
            url: "get_chart.php",
            method: "POST",
            data: { id: id },
            dataType: "json",
            success: function (response) {
                if (window.myChart) {
                    window.myChart.destroy();
                }

                var ctx = document.getElementById("chartCanvas").getContext("2d");
                window.myChart = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: ["Half Life (Days)", "Degradation Efficiency", "Particle Size"],
                        datasets: [{
                            label: "Microplastic Data",
                            data: [
                                response.half_life,
                                response.degradation_efficiency,
                                response.particle_size
                            ],
                            backgroundColor: ["rgba(255, 99, 132, 0.6)", "rgba(54, 162, 235, 0.6)", "rgba(255, 206, 86, 0.6)"]
                        }]
                    }
                });
            }
        });
    });
});