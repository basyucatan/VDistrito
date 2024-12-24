document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('graficaPastel').getContext('2d');

    // Extrae los nombres de los grupos y los números de miembros desde dataGrafica
    const labels = dataGrafica.map(item => {
        return item.grupo.length > 15 ? item.grupo.substring(0, 15) + '...' : item.grupo;
    });
    const data = dataGrafica.map(item => item.numMiembros);

    // Función para generar un color aleatorio
    function getRandomColor() {
        let r, g, b;
        do {
            r = Math.floor(Math.random() * 256);
            g = Math.floor(Math.random() * 256);
            b = Math.floor(Math.random() * 256);
        } while (Math.abs(r - g) < 80 && Math.abs(g - b) < 80 && Math.abs(r - b) < 80);
        return `rgba(${r}, ${g}, ${b}, 1)`;
    }

    // Genera un conjunto de colores aleatorios para cada grupo
    const backgroundColors = Array.from({ length: labels.length }, getRandomColor);
    const borderColors = backgroundColors.map(color => color.replace('0.8', '1'));

    const chartData = {
        labels: labels,
        datasets: [{
            label: 'Asistieron',
            data: data,
            backgroundColor: backgroundColors,
            borderColor: borderColors,
            borderWidth: 1
        }]
    };

    // Configuración de la gráfica
    const myPieChart = new Chart(ctx, {
        type: 'pie',
        data: chartData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        color: 'rgba(255, 255, 50, 1)', // Color del texto de la leyenda
                        usePointStyle: true,
                        font: {
                            size: 14,
                            weight: 'bold'
                        },
                        // Añadir sombra para simular un borde
                        textStrokeColor: '#000', // Color del borde (negro)
                        textStrokeWidth: 5,
                        textShadow: '2px 2px 3px rgba(0,0,0,0.5)', // Sombra para dar efecto de borde
                    }
                },
                title: {
                    display: true,
                    text: '50o Aniversario del V Distrito',
                    color: 'rgba(255, 0, 0, 1)', // Título en color rojo
                    font: {
                        size: 24,
                        weight: 'bold'
                    },
                    // Añadir sombra al título
                    padding: {
                        top: 20,
                        bottom: 20
                    },
                    fullSize: true,
                    textStrokeColor: '#fff',
                    textStrokeWidth: 2,
                    textShadow: '3px 3px 4px rgba(0,0,0,0.5)' // Sombra para simular un borde en el título
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.5)', // Fondo del tooltip
                    titleColor: 'rgba(255, 255, 255, 1)', // Color del texto del título en el tooltip
                    bodyColor: 'rgba(255, 255, 255, 1)', // Color del texto del cuerpo en el tooltip
                    borderColor: 'rgba(255, 255, 255, 1)', // Color del borde del tooltip
                    borderWidth: 1,
                    displayColors: false // No mostrar colores en el tooltip
                }
            }
        }
    });
});
