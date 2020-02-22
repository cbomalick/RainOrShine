import React from 'react';
import '../styles/weather.css';

function WeatherFeed(props){
    const { temp, tempMin, tempMax, humidity, description, city, timestamp, icon } = props.data;
    return(
      <React.Fragment>
          <div className="wrapper">
              <div className="box">
              <div className="metric">
                      <p><img src={"http://openweathermap.org/img/wn/"+icon+"@2x.png"}/></p>
                  </div>
                  <div className="metric">
                      <h4>{city}</h4>
                      <p>{timestamp}</p>
                  </div>
                  <div className="metric">
                      <h4>{temp}°F and {description}</h4>
                      <p>Weather</p>
                  </div>
                  <div className="metric">
                      <h4>{tempMin}°F / {tempMax}°F</h4>
                      <p>Min / Max</p>
                  </div>
                  <div className="metric">
                      <h4>{humidity}%</h4>
                      <p>Humidity</p>
                  </div>
              </div>
          </div>
      </React.Fragment>
    );
}

export default WeatherFeed;