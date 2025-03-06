import { Chart, registerables } from 'chart.js';

// Регистрируем все компоненты Chart.js один раз
Chart.register(...registerables);

export default Chart;
