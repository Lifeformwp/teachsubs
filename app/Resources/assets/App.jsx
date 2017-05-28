import React, { Component } from 'react';

class App extends Component {
    constructor(props) {
        super(props);
        this.state = {
            translation: '',
            meaning: ''
        }
    }
    loadNotesFromServer() {
    $.ajax({
        url: 'http://localhost:8000/api/'+this.state.meaning+'/eng/rus',
        success: function (data) {
            this.setState({translation: data[0]});
        }.bind(this)
    });
    }

    render() {
        return (
            <div>
                <div className="notes-container">
                    {
                    this.state.translation !== ''
                    ?
                    <div>
                        <h2 className="notes-header">Перевод: {this.state.translation['text']}</h2>
                        <h2 className="notes-header">Язык: {this.state.translation['language']}</h2>
                    </div>
                    : <div></div>
                    }
                    <div>
                    <input
                       type='text'
                       onChange={event => this.setState({meaning: event.target.value})}
                       onKeyPress={event => {
                           if (event.key === 'Enter') {
                               this.loadNotesFromServer()
                           }}
                       }></input>

                    <button onClick={() => this.loadNotesFromServer()}>Submit</button>
                    </div>
                </div>
            </div>
        )
    }
}

export default App;
