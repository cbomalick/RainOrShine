import React from 'react';
import '../styles/weather.css';
import { Button } from '@material-ui/core';

const firebase = require('firebase');

function WeatherInfo(props){
    const { temp, tempMin, tempMax, humidity, description, city, icon } = props.data;
    
    return(
      <React.Fragment>
          <div className="wrapper">
              <div className="box">
              <div className="metric">
                      <p><img src={"http://openweathermap.org/img/wn/"+icon+"@2x.png"}/></p>
                  </div>
                  <div className="metric">
                      <h4>{city}</h4>
                      <p></p>
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
          <Button 
            className=""
            variant="contained"
            color="primary"
            onClick={
                ()=>{ newWeather(props); }
            }>Share Weather</Button>
      </React.Fragment>
    );

   function newWeather(weather){
        const newFromDB = firebase
        .firestore()
        .collection('weather')
        .add({
          city: weather.data.city,
          description: weather.data.description,
          humidity: weather.data.humidity,
          icon: weather.data.icon,
          tempMax: weather.data.tempMax,
          tempMin: weather.data.tempMin,
          temperature: weather.data.temp,
          timestamp: firebase.firestore.FieldValue.serverTimestamp()
        });
        
       
      }
    
}

export default WeatherInfo;