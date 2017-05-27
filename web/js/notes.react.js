var NoteSection = React.createClass({
    getInitialState: function() {
        return {
            translation: [],
            meaning: []
        }
    },

    componentDidMount: function() {
    },

    loadNotesFromServer: function() {
        $.ajax({
            url: 'http://localhost:8000/api/'+this.state.meaning+'/eng/rus',
            success: function (data) {
                this.setState({translation: data[0]});
            }.bind(this)
        });

    },

    keyPressed: function(setting) {
        /*var s = document.getElementById('subtitles-video-js-get').getElementsByTagName('div')[0];;
        console.log(s.textContent);*/
            if (setting === 'Enter') {
                this.loadNotesFromServer()
            }


    },

    render: function() {
        console.log(this.state.meaning);
        return (
            <div>
                <div className="notes-container">
                    <h2 className="notes-header">Перевод: {this.state.translation['text']}</h2>
                    <h2 className="notes-header">Язык: {this.state.translation['language']}</h2>
                    <input type='text' onChange={event => this.setState({meaning: event.target.value})} onKeyPress={event => this.keyPressed(event.key)}></input>
                    <button onClick={() => this.loadNotesFromServer()}>Submit</button>
                </div>
            </div>
        );
    }
});
/*
var NoteList = React.createClass({
    render: function() {
        var noteNodes = this.props.notes.map(function(note) {
            return (
                <NoteBox username={note} avatarUri={note} date={note} key={note.id}>{note.note}</NoteBox>
            );
        });

        return (
            <section id="cd-timeline">
                {noteNodes}
            </section>
        );
    }
});

var NoteBox = React.createClass({
    render: function() {
        return (
            <div className="cd-timeline-block">
            <div className="cd-timeline-img">
            <img width="60px" height="60px" src={this.props.avatarUri} className="img-circle" alt="Leanna!" />
            </div>
            <div className="cd-timeline-content">
            <h2><a href="#">{this.props.username}</a></h2>
        <p>{this.props.children}</p>
        <span className="cd-date">{this.props.date}</span>
        </div>
        </div>
        );
    }
});
*/
window.NoteSection = NoteSection;
