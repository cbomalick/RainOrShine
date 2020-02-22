import React from 'react';
import '../styles/App.css';
import WeatherContainer from './WeatherContainer';
import SidebarComponent from './sidebar';

const firebase = require('firebase');

class App extends React.Component{

  constructor(){
    super();
    this.state = {
      selectedWeatherIndex: null,
      selectedWeather: null,
      weathers: null
    }
  }
  
  render(){
    return(
    <div className="app-container">
      <WeatherContainer />
      <SidebarComponent 
      selectedWeatherIndex = {this.state.selectedWeatherIndex}
      weathers = {this.state.weathers}
      ></SidebarComponent>
      </div>
    );
  }

  //Renders the db entries
  componentDidMount = () => {
    firebase
      .firestore()
      .collection('weather')
      .onSnapshot(serverUpdate => {
        const weathers = serverUpdate.docs.map(_doc => {
          const data = _doc.data();
          data['id'] = _doc.id;
          return data;
        });
        this.setState({ weathers: weathers});
      });

  }

}

export default App;
