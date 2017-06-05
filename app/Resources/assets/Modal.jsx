import React, { Component } from 'react';
import VideoPlayer from './Video.jsx';

class Modal extends Component {

    constructor(props) {
        super(props);
        this.state = {
            words: '',
            previousWord:'stop'
        }
    }

    componentWillReceiveProps() {
        this.setState({previousWord: this.props.nodes}, function () {
            this.translate();
        });
    }

     translate() {
        let transWords = this.props.nodes.toLowerCase();
        const BASE_URL = `https://glosbe.com/gapi/translate?from=eng&dest=ru&format=json&phrase=`;
        let FETCH_URL = `http://localhost:8000/api/${transWords}/eng/rus`;
        console.log(FETCH_URL);

        fetch(FETCH_URL, {
            method: 'GET',
        })
        .then(response => response.json())
        .then(json => {
            const query = json.text;
            this.setState({words: query});
        });
         return (
             <div id="myModal" className="modal">
                 <div className="modal-content">
                     <span className="close">&times;</span>
                     <p>{this.state.words}</p>
                 </div>
             </div>
         )
    }
    render() {
        return (
            <div>
                {this.state.words}
            </div>
        )
    }
}

export default Modal;