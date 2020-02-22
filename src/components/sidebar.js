import React from 'react';
import List from '@material-ui/core/List';
import SidebarItemComponent from './sidebarItem';

class SidebarComponent extends React.Component{
    constructor(){
        super();
        this.state = {
            temp: '',
            humidity: '',
            description: '',
            city: '',
            timestamp: '',
            icon: '',
            tempMin: '',
            tempMax: ''
        };
    }

    render(){
        const { weathers, selectedWeatherIndex } = this.props;

        if(weathers){
            return(
                <div className="sidebarContainer">
                    <List>
                        {
                            weathers.map((_weather, _index) => {
                                return(
                                    <div key={_index}>
                                        <SidebarItemComponent
                                        _weather = {_weather}
                                        _index = {_index}
                                        selectedWeatherIndex = {selectedWeatherIndex}>
                                        </SidebarItemComponent>
                                    </div>
                                )
                            })
                        }
                    </List>
                </div>
                );
        } else {
            return(<div></div>);
        }
    }

}

export default SidebarComponent;