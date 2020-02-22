import React, { useState} from 'react';
import '../styles/weather.css';
import WeatherInfo from './WeatherInfo';

function WeatherContainer(){
    const API_KEY = 'YOUR_OPENWEATHERMAP_API_KEY';
    const [searchQuery, setSearchQuery] = useState('');
    const [weatherData, setWeatherData] = useState({
        temp: null,
        humidity: null,
        description: null,
        city: null,
        timestamp: null,
        id: null,
        icon: null
    });

    const [isValidZipCode, setIsValidZipCode] = useState(true);
        
    function updateSearchQuery({ target: { value } }) {
        setSearchQuery(value);
        setIsValidZipCode(value === '' || validateZipCode(value));
      }

    function validateZipCode(zipCode){
        let regex = /[0-9]{5}/;
        return regex.test(zipCode);
    }

    function convertToFarenheit(temp){
        return ((temp - 273.15) * (9.0 / 5.0) + 32).toFixed(0);
    }

    function getWeatherData(){
        if(!isValidZipCode || searchQuery === ""){
            setIsValidZipCode(false);
            return;
        }
        fetch(`https://api.openweathermap.org/data/2.5/weather?zip=${searchQuery},us&appid=${API_KEY}`)
        .then(response => response.json())
        .then(data => setWeatherData({
            temp: convertToFarenheit(data.main.temp),
            humidity: data.main.humidity,
            description: data.weather[0].main,
            city: data.name,
            timestamp: data.timestamp,
            icon: data.weather[0].icon,
            tempMin:convertToFarenheit(data.main.temp_min),
            tempMax: convertToFarenheit(data.main.temp_max)
        }));
    }

    return (
        <section className="weather-container">
            <header className="weather-header">
                <div>
                    <input 
                        placeholder="Zip"
                        className="search-input"
                        onChange={updateSearchQuery}
                        maxLength="5"/>
                    <button 
                    className="material-icons"
                    onClick={getWeatherData}
                        >search</button>
                </div>
            </header>
                <p className="error">
                    {
                        isValidZipCode ?
                        '' :
                        'Invalid Zip Code'
                    }
                </p>
            <section className="weather-info">
        {
        weatherData.temp === null ? 
        '' : 
        <WeatherInfo 
            data={weatherData}/>
        }
            </section>
            <section className="weather-feed">
                <h2>Feed</h2>
            </section>
        </section>
    )
}

export default WeatherContainer;