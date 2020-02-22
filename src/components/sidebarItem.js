import React from 'react';
import ListItem from '@material-ui/core/ListItem';

class SidebarItemComponent extends React.Component{

    render(){

        const { _index, _weather } = this.props;
        var postedTime = '';

        if(_weather.timestamp){
            const format = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const t = new Date(_weather.timestamp.toDate());
            postedTime = t.toLocaleDateString("en-US", format);
        }

        return(
        <div key={_index}>
            <ListItem>
                    <div className="wrapper">
                        <div className="box">
                            <div className="metric">
                                    <p><img src={"http://openweathermap.org/img/wn/"+_weather.icon+"@2x.png"}/></p>
                            </div>
                            <div className="metric">
                                <h4>{_weather.city}</h4>
                                <p>{postedTime}</p>
                            </div>
                            <div className="metric">
                                <h4>{_weather.temperature}°F and {_weather.description}</h4>
                                <p>Weather</p>
                            </div>
                            <div className="metric">
                                <h4>{_weather.tempMin}°F / {_weather.tempMax}°F</h4>
                                <p>Min / Max</p>
                            </div>
                            <div className="metric">
                                <h4>{_weather.humidity}%</h4>
                                <p>Humidity</p>
                            </div>
                        </div>
                    </div>
            </ListItem>
        </div>
        );
    }
}


export default SidebarItemComponent;